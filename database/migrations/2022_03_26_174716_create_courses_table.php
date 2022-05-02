<?php

use App\Models\Course;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('subtitle');
            $table->text('description');
            $table->enum('status',[Course::BORRADOR,Course::REVISION,Course::PUBLICADO])->default(Course::BORRADOR);//1-borrador,2-revision(un administrador lo apruebe),3-publicado
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('level_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('price_id')->nullable();
            $table->timestamps();

            // ! foreign key
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('level_id')
            ->references('id')
            ->on('levels')
            ->onDelete('set null');

            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->onDelete('set null');

            $table->foreign('price_id')
            ->references('id')
            ->on('prices')
            ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
