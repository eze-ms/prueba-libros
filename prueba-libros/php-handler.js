// netlify/functions/php-handler.js
const { createServer } = require('http');
const { spawnSync } = require('child_process');

exports.handler = async function (event, context) {
  const phpProcess = spawnSync('php', ['-r', 'echo "Hello from PHP!";']);
  const phpOutput = phpProcess.stdout.toString();

  return {
    statusCode: 200,
    body: `Hello from JavaScript and PHP! PHP says: ${phpOutput}`,
  };
};
