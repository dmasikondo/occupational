<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('first_name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->boolean('must_reset')->default(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('label')->nullable();
            $table->timestamps();
        });

        //insert some role names
        DB::table('roles')->insert([
                ['name' => 'admin', 'label'=>'system adminstrator','created_at'=>now(),'updated_at'=>now()],
                ['name' => 'safety', 'label'=>'safety officer','created_at'=>now(),'updated_at'=>now()],

            ]);

        Schema::create('role_user', function (Blueprint $table) {
            $table->primary(['user_id','role_id']);
            $table->foreignId('user_id');
            $table->foreignId('role_id');
            $table->timestamps();
        });        
           //insert first user
        DB::table('users')->insert([
            [
                'uuid' =>Str::uuid(),
                'first_name' => 'britney',
                'surname' => 'makweche',
                'email' => 'britneytmak@gmail.com',
                'password'=>Hash::make('password'),
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            
        ]);

        //make first user an admin user
        $user = DB::table('users')->where('email', 'britneytmak@gmail.com')->first();  
        $admin_role = DB::table('roles')->where('name', 'admin')->first();
        DB::table('role_user')->insert([
            [
                'user_id' =>$user->id,
                'role_id' => $admin_role->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            
        ]);

    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_user');
        Schema::dropIfExists('roles');         
        Schema::dropIfExists('users');
    }
};
