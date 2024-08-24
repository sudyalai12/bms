<?php

use App\Models\Address;
use App\Models\Company;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Department;
use App\Models\Tax;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->timestamps();
        });

        Schema::create('tax', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->timestamps();
        });

        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->timestamps();
        });

        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Customer::class, 'customer_id')->constrained()->onDelete('cascade');
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->string('pincode');
            $table->string('state');
            $table->timestamps();
        });

        Schema::create('contact_persons', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Customer::class, 'customer_id')->constrained()->onDelete('cascade');
            $table->foreignIdFor(Department::class, 'department_id')->constrained()->onDelete('cascade');
            $table->foreignIdFor(Address::class, 'address_id')->constrained()->onDelete('cascade');
            $table->foreignIdFor(Country::class, 'country_id')->constrained()->onDelete('cascade');
            $table->foreignIdFor(Tax::class, 'tax_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('mobile');
            $table->string('gstn');
            $table->string('pan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_persons');
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('countries');
        Schema::dropIfExists('tax');
    }
};
