<?php

use App\Models\Address;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Department;
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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Company::class, 'company_id')->constrained()->onDelete('cascade');
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->string('pincode');
            $table->string('state');
            $table->enum('country', Address::$countryList)->default('India');
            $table->timestamps();
        });

        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Company::class, 'company_id')->constrained()->onDelete('cascade');
            $table->foreignIdFor(Department::class, 'department_id')->constrained()->onDelete('cascade');
            $table->foreignIdFor(Address::class, 'address_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('mobile');
            $table->enum('tax_type', Customer::$taxTypes)->default('GST');
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
        Schema::dropIfExists('companies');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('customers');
    }
};
