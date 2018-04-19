<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\State;

class StateListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan make:migration create_states_table --create=states
     * php artisan migrate
     * php artisan migrate:fresh --seed
     * php artisan make:seeder StateList
     * php artisan db:seed --class=StateList
     * 'email' => str_random(10).'@gmail.com',
     * @return void
     */

    public function run( )
    {
        $states = array (
        'AL'=>'Alabama',
        'AK'=>'Alaska',
        'AZ'=>'Arizona',
        'AR'=>'Arkansas',
        'CA'=>'California',
        'CO'=>'Colorado',
        'CT'=>'Connecticut',
        'DE'=>'Delaware',
        'DC'=>'District Of Columbia',
        'FL'=>'Florida',
        'GA'=>'Georgia',
        'HI'=>'Hawaii',
        'ID'=>'Idaho',
        'IL'=>'Illinois',
        'IN'=>'Indiana',
        'IA'=>'Iowa',
        'KS'=>'Kansas',
        'KY'=>'Kentucky',
        'LA'=>'Louisiana',
        'ME'=>'Maine',
        'MD'=>'Maryland',
        'MA'=>'Massachusetts',
        'MI'=>'Michigan',
        'MN'=>'Minnesota',
        'MS'=>'Mississippi',
        'MO'=>'Missouri',
        'MT'=>'Montana',
        'NE'=>'Nebraska',
        'NV'=>'Nevada',
        'NH'=>'New Hampshire',
        'NJ'=>'New Jersey',
        'NM'=>'New Mexico',
        'NY'=>'New York',
        'NC'=>'North Carolina',
        'ND'=>'North Dakota',
        'OH'=>'Ohio',
        'OK'=>'Oklahoma',
        'OR'=>'Oregon',
        'PA'=>'Pennsylvania',
        'RI'=>'Rhode Island',
        'SC'=>'South Carolina',
        'SD'=>'South Dakota',
        'TN'=>'Tennessee',
        'TX'=>'Texas',
        'UT'=>'Utah',
        'VT'=>'Vermont',
        'VA'=>'Virginia',
        'WA'=>'Washington',
        'WV'=>'West Virginia',
        'WI'=>'Wisconsin',
        'WY'=>'Wyoming',
    );

        // Create State table
        foreach($states as $key => $value) {

            DB::table('states')->insert([
                'state' => $value,
                'abbreviation' => $key,
            ]);

           /* Error on timestampe
                $state = new State();
                $state->state = $value;
                $state->abbreviation = $key;
                $state->save(); */
        }
    }
}
