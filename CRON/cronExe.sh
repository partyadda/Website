result=$(curl -X GET --header "Accept: */*" "https://partyadda.com/cron_job_execute")
echo "Response from server"
echo $result
exit