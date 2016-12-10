<?php

use Illuminate\Database\Seeder;

class ProjectClassOptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project_options = [
		        ['project_class_title'=>'Occupied', 'project_class_notes'=>'Occupied'],
				['project_class_title'=>'Commercial', 'project_class_notes'=>'Commercial'],
				['project_class_title'=>'New Construction', 'project_class_notes'=>'New Construction']
		];  
		
		DB::table('project_class_options')->insert($project_options);
    }
}
