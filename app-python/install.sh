#!/bin/bash

cd $(dirname $0)
virtualenv gae
source gae/bin/activate
pip install -t lib -r requirements.txt