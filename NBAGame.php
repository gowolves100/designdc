<?php
//PHP code to fetch data from the NBA API, process it, and display the results
        
		class NBAGame {
			
            public $id;
            public $date;
            public $teams;
            public $status;
            public $score;
            public $arena;

            public function __construct($id, $date, $teams, $status, $score, $arena) {
                $this->id = $id;
                $this->date = $date;
                $this->teams = $teams;
                $this->status = $status;
                $this->score = $score;
                $this->arena = $arena;
            }
        }

        // Function to fetch data from the NBA API
        function fetchGameData() {
            $apiEndpoint = 'https://v2.nba.api-sports.io/games?season=2022'; // API endpoint, parm required
            $apiKey = '2584a90e80f3dbc80efee017ba1b52a3'; // Account API key
			$headers = [
                'X-RapidAPI-Host: v2.nba.api-sports.io',
                'X-RapidAPI-Key: ' . $apiKey,
            ];

            // Initialize cURL
            $ch = curl_init();

            // Set cURL options
            curl_setopt($ch, CURLOPT_URL, $apiEndpoint);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $season);
            // Execute the API request
            $response = curl_exec($ch);

            // Check for errors
            if ($response === false) {
                // Error handling if API request fails
                echo 'Failed to fetch data from the API: ' . curl_error($ch);
                return [];
            }

            // Close cURL
            curl_close($ch);

            // Process the data, get results, use responses
            $games = [];
            $data = json_decode($response, true);
			if(isset($data)) {
				foreach ($data["response"] as $gameid) {
					// for each response array gather data
					$id = $gameid['id']; 
					$date = date('Y-m-d h:i:s', strtotime($gameid['date']['start']));
					$teams = $gameid['teams']['visitors']['name'] . ' vs ' . $gameid['teams']['home']['name'];
					$status = $gameid['status']['long'];
					$score = $gameid['scores']['visitors']['points'] . ' - ' . $gameid['scores']['home']['points'];
					$arena = $gameid['arena']['name'];

					// gather game inforation to add to an array of games for table

					$game = new NBAGame($id, $date, $teams, $status, $score, $arena);
					$games[] = $game;
					}
				
				}
				return $games;
			}

        // Display the extracted information using Datatables
        function displayGames($games)
        {
            echo '<table id="NBAGame" class="stripe order-column hover row-border">';
			echo '<thead>';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Date</th>';
            echo '<th>Teams</th>';
            echo '<th>Status</th>';
            echo '<th>Score</th>';
            echo '<th>Arena</th>';
            echo '</tr>';
			echo '</thead>';
			echo '<tbody>';

			
            foreach ($games as $game) {
                echo '<tr>';
                echo '<td>' . $game->id . '</td>';
				echo '<td>' . $game->date . '</td>';
                echo '<td>' . $game->teams . '</td>';
                echo '<td>' . $game->status . '</td>';
                echo '<td>' . $game->score . '</td>';
                echo '<td>' . $game->arena . '</td>';
                echo '</tr>';
            }
			echo '</tbody>';
            echo '</table>';
        }
		// Fetch data from the API
		//echo('called2');
        $games = fetchGameData();

        // Display the extracted information
        displayGames($games);
