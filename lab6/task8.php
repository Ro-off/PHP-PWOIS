<?php 

class TwitterService 
{     
  public function setMessage($text) 
  { 
    $this->_data['message'] = $text; 
    echo $this->_data['message'].PHP_EOL; 
  } 

  public function sendTweet() 
  { 
    echo "I sent a tweet"; 
  } 
} 

class SmsService 
{
  protected $_data;
  
  public function setRecipient($recipient)
  {
    $this->_data['recipient'] = $recipient;
  }
  
  public function setMessage($message)
  {
    $this->_data['message'] = $message;
  }
  
  public function setSendTime($time)
  {
    $this->_data['send_time'] = $time;
  }
  
  public function sendText()
  {
    echo "I sent a text to " . $this->_data['recipient'] . " at " . $this->_data['send_time'];
  }
}

interface NotificationInterface 
{   
  public function setData($data);   
  public function sendNotification(); 
} 

class TwitterAdapter implements NotificationInterface 
{   
  protected $_data;   
  
  public function setData($data)
  { 
    $this->_data = $data; 
  } 
  
  public function sendNotification() 
  { 
    $twitterClient = new TwitterService(); 
    $twitterClient->setMessage($this->_data['message']); 
    $twitterClient->sendTweet(); 
  } 
} 

class SmsAdapter implements NotificationInterface 
{   
  protected $_data;   
  
  public function setData($data)
  { 
    $this->_data = $data; 
  } 
  
  public function sendNotification() 
  { 
    $smsClient = new SmsService(); 
    $smsClient->setRecipient($this->_data['recipient']); 
    $smsClient->setMessage($this->_data['message']); 
    $smsClient->setSendTime($this->_data['send_time']);
    $smsClient->sendText(); 
  } 
} 

interface INotificationManager  
{ 
  public function sendNotification($type = '', $data); 
} 

class NotificationManager implements INotificationManager 
{ 
  public function sendNotification($type = '', $data) 
  {     
    switch($type)
    {       
      case "twitter": 
        $notification = new TwitterAdapter(); 
        break;       
      case "sms": 
        $notification = new SmsAdapter();         
        break;         
      default: 
        echo "error";         
        return false;         
        break; 
    } 
   
    $notification->setData($data); 
    $notification->sendNotification();    
  } 
} 

$array = array( 
  "message" => "This is tweet"
);

$smsArray = array(
  "recipient" => "1234567890",
  "message" => "This is a text message",
  "send_time" => "2022-01-01 12:00:00"
);

$a = new NotificationManager(); 
$a->sendNotification("twitter", $array);
$a->sendNotification("sms", $smsArray);
?>
