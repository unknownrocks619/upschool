<?php

namespace App\Models\Corcel;

use Corcel\Model as CorcelModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookDonationData extends CorcelModel
{
    use HasFactory;

    protected $connection = "wp_compactibility";
    protected $table = "book_donation_data";


    public function post(BookDonationData $book_donation)
    {
    }
}
