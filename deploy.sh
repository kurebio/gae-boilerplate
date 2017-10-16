#!/bin/bash

appcfg.py update app.yaml app-backend.yaml app-go/app.yaml app-python/app.yaml && \
appcfg.py update_dispatch ./ && \
appcfg.py update_cron .