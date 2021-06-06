<?php

use App\Models\Avatar;
use App\Models\Backpack;
use App\Models\Item;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemOwnershipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_ownerships', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Avatar::class);
            $table->foreignIdFor(Backpack::class);
            $table->foreignIdFor(Item::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_ownerships');
    }
}
