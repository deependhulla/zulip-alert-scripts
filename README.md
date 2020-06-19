# zulip-alert-scripts
Scripts for System Alert to private or stream with file upload option too


##Do curl installation
```
 apt-get install curl php
```
Based on API : https://zulipchat.com/api/send-message#usage-examples

## Single User only Text Msg 
```
php send-zulip-msg.php "private" "deepen@technoinfotech.com" "text Msg Here"
```
##only Text Msg for Stream in one topic.
```
php send-zulip-msg.php "stream" "ClubEmerald IT" "SystemAlerts"  "Text Msg Here"
```
#  Text Msg + any file upload (max 25MB) to single user
```
php send-zulip-msg.php "private" "deepen@technoinfotech.com" "text Msg Here " 
"/var/www/html/downloads/club-whatapps-logo.png"
```
#  Text Msg + any file upload (max 25MB) for Stream in one topic.
```
php send-zulip-msg.php stream "ClubEmerald IT" "SystemAlerts"  "Text Msg Here" "/var/www/html/downloads/club-whatapps-logo.png"
```
If see Need text formatting we need to use guideline from below URL. we based used "code" for file-server status.

https://zulipchat.com/help/format-your-message-using-markdown#latex


