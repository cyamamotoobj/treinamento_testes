#!/bin/bash
SCRIPT=$(readlink -f "$0")
SCRIPTPATH=$(dirname "$SCRIPT")
docker-compose -f $SCRIPTPATH/docker-compose.yml run php $@