<?php
require_once (__DIR__ . '/vendor/autoload.php');

function route($method, $pattern, $callback)
{
  if (strcasecmp($_SERVER['REQUEST_METHOD'], $method) === 0 &&
    preg_match($pattern, $_SERVER['REQUEST_URI'], $match)) {
    $callback($match);
    exit(0);
  }
}

function run()
{
  route('GET', '/^\/cron(\/.*)?$/', cron_handler);
  route('GET', '/^\/admin(\/.*)?$/', admin_handler);
  route('GET', '/^(\/.*)/', general_get_handler);
  route('POST', '/^(\/.*)/', general_post_handler);

  http_response_code(400);
}

run();

function cron_handler($match)
{
  output_json([
    'method' => 'get',
    'handler' => 'cron',
    'uri' => $match[0],
  ]);
}

function admin_handler($match)
{
  output_json([
    'method' => 'get',
    'handler' => 'admin',
    'uri' => $match[0],
  ]);
}

function general_get_handler($match)
{
  output_json([
    'method' => 'get',
    'handler' => 'general',
    'uri' => $match[1],
  ]);
}

function general_post_handler($match)
{
  output_json([
    'method' => 'post',
    'handler' => 'general',
    'uri' => $match[1],
  ]);
}

function output_json($data)
{
  echo json_encode(array_merge([
    'project_id' => getenv('PROJECT_ID'),
    'service' => $_SERVER['CURRENT_MODULE_ID'],
  ], $data));
}