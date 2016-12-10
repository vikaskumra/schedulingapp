<?php

use Illuminate\Database\Seeder;

class TradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trades = [
		          ['trade_title'=>'Boilermaker', 'trade_notes'=>'Boilermaker'],
				  ['trade_title'=>'Carpenter', 'trade_notes'=>'Carpenter'],
				  ['trade_title'=>'Carpet layer', 'trade_notes'=>'Carpet layer'],
				  ['trade_title'=>'Dredger', 'trade_notes'=>'Dredger'],
				  ['trade_title'=>'Electrician', 'trade_notes'=>'Electrician'],
				  ['trade_title'=>'Linemen', 'trade_notes'=>'Linemen'],
				  ['trade_title'=>'Elevator mechanic', 'trade_notes'=>'Elevator mechanic'],
				  ['trade_title'=>'Fencer', 'trade_notes'=>'Fencer'],
				  ['trade_title'=>'Glazier', 'trade_notes'=>'Glazier'],
				  ['trade_title'=>'Heavy equipment operator', 'trade_notes'=>'Heavy equipment operator'],
				  ['trade_title'=>'Insulation', 'trade_notes'=>'Insulation'],
				  ['trade_title'=>'Ironworker', 'trade_notes'=>'Ironworker'],
				  ['trade_title'=>'Laborer', 'trade_notes'=>'Laborer'],
				  ['trade_title'=>'Landscaper', 'trade_notes'=>'Landscaper'],
				  ['trade_title'=>'Mason', 'trade_notes'=>'Mason'],
				  ['trade_title'=>'Millwright', 'trade_notes'=>'Millwright'],
				  ['trade_title'=>'House painter and decorator', 'trade_notes'=>'House painter and decorator'],
				  ['trade_title'=>'Pile driver', 'trade_notes'=>'Pile driver'],
				  ['trade_title'=>'Plasterer', 'trade_notes'=>'Plasterer'],
				  ['trade_title'=>'Plumber', 'trade_notes'=>'Plumber'],
				  ['trade_title'=>'Pipefitter', 'trade_notes'=>'Pipefitter'],
				  ['trade_title'=>'Sheet metal worker', 'trade_notes'=>'Sheet metal worker'],
				  ['trade_title'=>'Fire sprinkler', 'trade_notes'=>'Fire sprinkler'],
				  ['trade_title'=>'Safety manager', 'trade_notes'=>'Safety manager'],
				  ['trade_title'=>'Site manager', 'trade_notes'=>'Site manager'],
				  ['trade_title'=>'Steel fixer', 'trade_notes'=>'Steel fixer'],
				  ['trade_title'=>'Truck driver', 'trade_notes'=>'Truck driver'],
				  ['trade_title'=>'Waterproofer', 'trade_notes'=>'Waterproofer'],
				  ['trade_title'=>'Welder', 'trade_notes'=>'Welder']
				  
		];  
		
		
		
		          DB::table('trades')->insert($trades);
    }
}
