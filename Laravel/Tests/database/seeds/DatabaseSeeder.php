<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Customer;
use App\Site;
use App\EquipmentServices;
use App\Manufacturer;
use App\Contract;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //factory(App\User::class, 20)->create();
        //DB::table('users')->delete();
        
        Customer::create([
            'company_name' => 'Casey Denner Software Engineering',
            'contact_name' => 'Casey Denner', 
            'address_1' => '38 Old Road', 
            'address_2'=> 'Baglan',
            'address_3'=> , 
            'town' => 'Port Talbot', 
            'county' => 'West Glamorgan', 
            'postcode' => 'SA12 8TT', 
            'primary_telephone' => '07966287249', 
            'alternate_telephone' => '01639414304',
            'mobile' => '07966287249', 
            'email' => 'caseylouisee@me.com', 
            'sage_account' => 'N/A', 
            'payment_method' => 'Visa Debit',
        ]);
        
        Site::create([
            'site_name' => 'Casey Site 1', 
            'contact_name' => 'Casey Denner', 
            'customer_id' => '1',
            'address_1' => '38 Old Road', 
            'address_2'=> 'Baglan',
            'address_3'=> , 
            'town' => 'Port Talbot', 
            'county' => 'West Glamorgan', 
            'postcode' => 'SA12 8TT', 
            'primary_telephone' => '07966287249', 
            'alternate_telephone' => '01639414304',
            'mobile' => '07966287249', 
            'email' => 'caseylouisee@me.com', 
        ]);

        Model::reguard();
    }
}
