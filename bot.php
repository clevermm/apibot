

<?php
set_time_limit(0);
function makeCurl($api,$method,$datas=[]){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://api.telegram.org/bot{$api}/{$method}");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,
        http_build_query($datas));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec ($ch);
    curl_close ($ch);
    return $server_output;
}

$last_updated_id=0;
function getUpdates(){
    global $last_updated_id;
    $updates = json_decode(
        makeCurl("113422787:AAGmxRD5ABzfGlEqMm4f0WzwavrHQeMCiNw","getUpdates",[
            "offset"=>($last_updated_id+1)
        ])
    );
    if($updates->ok == true && count($updates->result) > 0){
        foreach($updates->result as $update){
            $last_updated_id = $update->update_id;
            $chat_id = $update->message->chat->id;
            $message_id = $update->message->message_id;
            $text= "پیام شما رسید .";
            makeCurl("113422787:AAGmxRD5ABzfGlEqMm4f0WzwavrHQeMCiNw","sendMessage",[
               "chat_id"=>$chat_id,
                "reply_to_message_id"=>$message_id,
                "text"=>$text
            ]);
        }
    }

    sleep(5);
    getUpdates();
}
getUpdates();
1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
37
38
39
40
<?php
set_time_limit(0);
function makeCurl($api,$method,$datas=[]){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://api.telegram.org/bot{$api}/{$method}");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,
        http_build_query($datas));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec ($ch);
    curl_close ($ch);
    return $server_output;
}
 
$last_updated_id=0;
function getUpdates(){
    global $last_updated_id;
    $updates = json_decode(
        makeCurl("113422787:AAGmxRD5ABzfGlEqMm4f0WzwavrHQeMCiNw","getUpdates",[
            "offset"=>($last_updated_id+1)
        ])
    );
    if($updates->ok == true && count($updates->result) > 0){
        foreach($updates->result as $update){
            $last_updated_id = $update->update_id;
            $chat_id = $update->message->chat->id;
            $message_id = $update->message->message_id;
            $text= "پیام شما رسید .";
            makeCurl("113422787:AAGmxRD5ABzfGlEqMm4f0WzwavrHQeMCiNw","sendMessage",[
               "chat_id"=>$chat_id,
                "reply_to_message_id"=>$message_id,
                "text"=>$text
            ]);
        }
    }
 
    sleep(5);
    getUpdates();
}
getUpdates();
