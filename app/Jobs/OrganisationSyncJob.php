<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Corcel\Post;
use App\Models\Organisation;
use App\Models\OrganisationProject;
use Corcel\Model\Meta\PostMeta;

class OrganisationSyncJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $laravelOrganisations = Organisation::select('wp_id')->get()->groupBy('wp_id')->toArray();
        $posts = Post::where('post_type', 'charity')
            ->whereNotIn('ID', array_keys($laravelOrganisations))
            ->cursor();

        foreach ($posts as $post) {
            $organisation = new Organisation();

            $organisation->name = $post->post_title;
            $organisation->slug = \Illuminate\Support\Str::slug($post->post_title);
            $organisation->description = $post->post_content;
            $organisation->created_at = $post->post_date;
            $organisation->short_description = $post->post_excerpt;
            $organisation->updated_at = $post->post_modified;
            $imageProperty = [
                'banner_image' => [
                    'original_filename' => '',
                    'path' => '',
                    'source' => 'wp',
                    'fullPath' => (string) $post->thumbnail
                ],
            ];
            $logo = [
                'original_filename' => '',
                'path' => '',
                'source' => 'wp',
                'fullPath' => (string) $post->logo
            ];
            $organisation->logo = $logo;
            // echo $post->thumbnail;
            $organisation->featured_image = $imageProperty;
            $organisation->wp_id = $post->getKey();

            $social = [
                'website' => $post->meta->website_url,
                'facebook' => $post->meta->facebook_url,
                'instagram' => $post->meta->instagram_url,
                'linkedin' => $post->meta->linkedin_url
            ];

            $organisation->website = $social;
            $organisation->active = true;

            // get all meta Porpert along with all charity projects.

            $charitieIDS = PostMeta::where('meta_key', 'charity_name')
                ->where('meta_value', $post->post_title)
                ->get()
                ->groupBy('post_id')
                ->toArray();

            $charities = Post::whereIn('ID', array_keys($charitieIDS))
                ->where('post_status', 'publish')
                ->where('post_type', 'charity-projects')
                ->get();

            $organisation->save();
            foreach ($charities as $charity) {
                $org_project = new OrganisationProject();
                $org_project->title = $charity->post_title;
                $org_project->slug = \Illuminate\Support\Str::slug($charity->post_title);
                $org_project->short_description = $charity->post_excerpt;
                $org_project->description = $charity->post_content;
                $org_project->created_at = $charity->post_date;
                $org_project->updated_at = $charity->post_modified;
                $org_project->country = $charity->location;
                $org_project->dontaion = (float) $charity->funds_raised;
                $org_project->wp_post_id = $charity->getKey();
                $org_project->genre = $charity->genre;

                $images = [
                    'banner' => [
                        'original_filename' => '',
                        'path' => '',
                        'source' => 'wp',
                        'fullPath' => $charity->thumbnail
                    ]
                ];

                $images['images'] = [
                    'image_one' => [
                        'original_filename' => '',
                        'path' => 'wp',
                        'source' => $charity->imageOne
                    ],
                    'image_two' => [
                        'original_filename' => '',
                        'path' => 'wp',
                        'source' => $charity->imageTwo
                    ],
                    'image_three' => [
                        'original_filename' => '',
                        'path' => 'wp',
                        'source' => $charity->imageThree
                    ],
                    'image_four' => [
                        'original_filename' => '',
                        'path' => 'wp',
                        'source' => $charity->imageFour

                    ],
                    'image_five' => [
                        'original_filename' => '',
                        'path' => 'wp',
                        'source' => $charity->imageFive
                    ],
                ];

                $additonalBlocks = [
                    'maps' => [
                        'location' => $charity->town_city,
                    ],
                    'topBlock' => [
                        [
                            'description' => $charity->description,
                            'image' => []
                        ]
                    ],
                    'blocks' => [
                        [
                            'image' => $charity->postImageOne,
                            'post' => $charity->postImageDescription
                        ],
                        [
                            'image' => $charity->postImageTwo,
                            'post' => $charity->postImageDescriptionTwo
                        ],
                        [
                            'image' => $charity->postImageThree,
                            'post' => $charity->postImageDescriptionThree
                        ],
                        [
                            'image' => $charity->postImageFour,
                            'post' => $charity->postImageDescriptionFour
                        ],
                        [
                            'image' => $charity->postImageFour,
                            'post' => $charity->postImageDescriptionFour
                        ]
                    ],
                ];

                $org_project->organisations_id = $organisation->getKey();
                $org_project->additional_blocks = $additonalBlocks;
                $org_project->images = $images;
                $org_project->save();
                // $org_project->short_description
            }
        }

        echo "Organisation and Projects Sync was successful." . PHP_EOL;
    }
}
