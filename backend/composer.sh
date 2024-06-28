#!/bin/bash

args="$@"
command="composer $args"
echo "$command"
docker exec -it backend bash -c "sudo -u root /bin/bash -c \"$command\""