// netlify/functions/php-handler.js
exports.handler = async function (event, context) {
  return {
    statusCode: 200,
    headers: {
      'Content-Type': 'application/json',
      'Access-Control-Allow-Origin': '*', // Puedes restringir esto según tus necesidades
    },
    body: JSON.stringify({ message: 'Hello from Netlify Function!' }),
  };
};


