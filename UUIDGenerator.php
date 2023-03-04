<?php
/**
 * This file is part of the UUIDGenerator.
 *
 * (c) Uriel Wilson
 *
 * Please see the LICENSE file that was distributed with this source code
 * for full copyright and license information.
 */

namespace Devuri\UUIDGenerator;

class UUIDGenerator
{
    private $data;
    private $version;
    private $variant;

    public function __construct( int $version = 4, int $variant = 2 )
    {
        $this->version = $version;
        $this->variant = $variant;
        $this->data    = $this->generateRandomBytes();
        $this->data    = $this->setVersion( $this->data, $this->version );
        $this->data    = $this->setVariant( $this->data, $this->variant );
    }

    public function generateUUID(): string
	{
        return $this->formatUUID( $this->data );
    }

    private function generateRandomBytes(): string
	{
        return random_bytes( 16 );
    }

    private function setVersion( string $data, int $version ): string
	{
        $data[6] = chr( ord( $data[6] ) & 0x0f | $version << 4 );
        return $data;
    }

    private function setVariant( string $data, int $variant ): string
	{
        $data[8] = chr( ord( $data[8] ) & 0x3f | $variant << 6 );
        return $data;
    }

	private function formatUUID(string $data): string {
	    $unpacked = unpack('Ntime_low/ntime_mid/ntime_hi_and_version/nclk_seq_hi_res/nclk_seq_low/Nnode', $data);
	    return sprintf(
	        '%08x-%04x-%04x-%04x-%04x%08x',
	        $unpacked['time_low'],
	        $unpacked['time_mid'],
	        $unpacked['time_hi_and_version'],
	        $unpacked['clk_seq_hi_res'],
	        $unpacked['clk_seq_low'],
	        $unpacked['node']
	    );
	}
}
