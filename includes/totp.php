<?php
/**
 * Septix Technologies - Pure PHP TOTP Helper (Microsoft Authenticator / Google Authenticator Compatible)
 * Implements RFC 6238 Time-Based One-Time Password Algorithm
 */

class TotpHelper {
    private static $base32chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567';

    /**
     * Generate a 16-character Base32 secret key
     */
    public static function generate_secret($length = 16) {
        $secret = '';
        for ($i = 0; $i < $length; $i++) {
            $secret .= self::$base32chars[random_int(0, 31)];
        }
        return $secret;
    }

    /**
     * Calculate current 6-digit TOTP code for a secret
     */
    public static function get_code($secret, $timeSlice = null) {
        if ($timeSlice === null) {
            $timeSlice = floor(time() / 30);
        }

        $secretkey = self::base32_decode($secret);
        $time = pack("N*", 0) . pack("N*", $timeSlice);
        $hmac = hash_hmac('sha1', $time, $secretkey, true);
        $offset = ord(substr($hmac, -1)) & 0x0F;
        $hashpart = substr($hmac, $offset, 4);

        $value = unpack('N', $hashpart);
        $value = $value[1];
        $value = $value & 0x7FFFFFFF;

        $modulo = pow(10, 6);
        return str_pad($value % $modulo, 6, '0', STR_PAD_LEFT);
    }

    /**
     * Verify a 6-digit TOTP code with clock drift window (+/- 1 slice)
     */
    public static function verify_code($secret, $code, $discrepancy = 1) {
        $currentTimeSlice = floor(time() / 30);

        for ($i = -$discrepancy; $i <= $discrepancy; $i++) {
            $calculatedCode = self::get_code($secret, $currentTimeSlice + $i);
            if (hash_equals((string)$calculatedCode, (string)$code)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Generate MS Authenticator / Google Authenticator OTPAuth URL
     */
    public static function get_qr_url($user, $secret, $title = 'Septix Technologies') {
        $user = urlencode($user);
        $title = urlencode($title);
        $otpauth = "otpauth://totp/{$title}:{$user}?secret={$secret}&issuer={$title}";
        return "https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=" . urlencode($otpauth);
    }

    /**
     * Base32 Decoder
     */
    private static function base32_decode($base32) {
        $base32 = strtoupper($base32);
        if (!preg_match('/^[A-Z2-7=]+$/', $base32)) {
            return '';
        }

        $base32 = str_replace('=', '', $base32);
        $binary = '';
        for ($i = 0; $i < strlen($base32); $i++) {
            $char = $base32[$i];
            $position = strpos(self::$base32chars, $char);
            $binary .= str_pad(decbin($position), 5, '0', STR_PAD_LEFT);
        }

        $bytes = '';
        for ($i = 0; $i < strlen($binary); $i += 8) {
            if ($i + 8 <= strlen($binary)) {
                $bytes .= chr(bindec(substr($binary, $i, 8)));
            }
        }
        return $bytes;
    }
}
?>
