<?php

use App\Notebook;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use App\User;
use Illuminate\Support\Facades\Schema;


class PopulateExamples extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Insert some stuff
        $User=new User();
        $User->nickname="Uriel Alejandro";
        $User->password=bcrypt("secret");
        $User->national_id=80123;
        $User->remember_token='a';
        $User->save();

        $User=new User();
        $User->nickname="Luis Perez";
        $User->password=bcrypt("secret");
        $User->national_id=70321;
        $User->remember_token='a';
        $User->save();

        $Notebook=new Notebook();
        $Notebook->user_id=1;
        $Notebook->name="Mi primer notebook";
        $Notebook->max_notes="15";
        $Notebook->save();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
