              <?php
                $json = $users;
                $obj = json_decode($json,true);
                echo $max=sizeof($obj[0]['proposal']);
                // echo $json->{'proposal'}->{'_id'};
                // echo array_get($json,'proposal');
                // $obj = json_decode($json,true);

                // echo $obj[1]['payment'][0]['job_name'];
            // $gh=json_decode($obj,'proposal');
            //     echo $gh[0];
                //$max=sizeof($obj);
                //$i=0;
                ?>