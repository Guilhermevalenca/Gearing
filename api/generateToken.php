<?php 
    
    function unauthorized () {
        http_response_code(401);
        exit();
    }

    function base64url_encode ($data) {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    function base64url_decode ($data) {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }

    function getSign ($header, $payload) {
        $string = $header . '.' . $payload;
        $binSign = hash_hmac('SHA256', $string, true);
        $base64sign = base64url_encode($binSign);
      
        return $base64sign;
    }

    
    function generateToken ($payload) {
        $header = json_encode([
            'alg' => 'HS256',
            'typ' => 'JWT'
        ]);
        $payload = json_encode($payload);

        $base64header = base64url_encode($header);
        $base64payload = base64url_encode($payload);

        $base64sign = getSign($base64header, $base64payload);

        return "$base64header.$base64payload.$base64sign";
    }

    function validateToken ($token) {
        $parts = explode('.', $token);
        if(sizeof($parts) != 3) {
            return false;
        }
        list($header, $payload, $sign) = $parts;
        if (getSign($header, $payload) == $sign) {
            return true;
        }
        return false;
    }
    function getTokenData ($token) {
        $parts = explode('.', $token);
        if (sizeof($parts) != 3) {
            return false;
        }
        $payload = $parts[1];
        return json_decode(base64_decode($payload), true);
    }
    ?>