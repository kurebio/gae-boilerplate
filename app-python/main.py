import os

from flask import Flask, render_template, request
app = Flask(__name__)


@app.route("/pages/")
def hello():
    return "Hello World!"


@app.route('/pages/pricing')
def pricing():
    return render_template('pricing.html', project_id=os.getenv('PROJECT_ID'))
