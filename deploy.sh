#!/bin/bash

appcfg.py update app.yaml app-backend.yaml app-go/
appcfg.py update_dispatch ./
appcfg.py update_cron .