<?php


class Ffmepg{


    const FFMPEG_BIN            = "ffmpeg";

    public static $setCommand   = null;

    public static $setInput     = null;

    public static $setOutput    = null;

    /**
     * @param string $setBin
     * @return $this
     */
    public  function __construct($setBin = self::FFMPEG_BIN){

        self::$setCommand[] = $setBin;
        return $this;

    }


    /**
     * @return Ffmepg
     */
    public static  function start(){

        return new self();

    }

    /**
     * @param string $setInput
     * @return $this
     */
    public function input($setInput = ""){

        self::$setCommand[]     = "-i";
        self::$setCommand[]     = $setInput;
        self::$setInput         = $setInput;
        return $this;

    }

    /**
     * @return $this
     */
    public function verbose(){

        self::$setCommand[]     = "-v";
        self::$setCommand[]     = "verbose";
        return $this;

    }

    /**
     * @param string $setOutput
     * @return $this
     */
    public function output($setOutput = ""){

        self::$setCommand[]     = $setOutput;
        self::$setOutput        = $setOutput;
        return $this;

    }

    /**
     * @param int $setMotion
     * @return $this
     */
    public function motion($setMotion = 2){

        self::$setCommand[]     = "-filter:v";
        self::$setCommand[]     = "setpts={$setMotion}*PTS";
        return $this;

    }


    /**
     * @param int $setFps
     * @return $this
     */
    public function fps($setFps = 10){

        self::$setCommand[]     = "-r";
        self::$setCommand[]     = $setFps;
        return $this;

    }

    public function scale($setScale = 500){

        self::$setCommand[]     = "-vf";
        self::$setCommand[]     = "scale={$setScale}:-1";
        return $this;

    }


    /**
     * @return $this
     */
    public function mute(){

        self::$setCommand[]     = "-an";
        return $this;

    }


    /**
     * @return $this
     */
    public function concat(){

        self::$setCommand[]     = "-d";
        self::$setCommand[]     = "concat";
        return $this;

    }


    /**
     * @param $setCommand
     * @return $this
     */
    public function manuel($setCommand){

        self::$setCommand[]     = $setCommand;
        return $this;

    }

    /**
     * @return $this
     */
    public function libX(){

        self::$setCommand[]     = "-c:v";
        self::$setCommand[]     = "libx264";
        return $this;

    }

    /**
     * @return $this
     */
    public function aac(){

        self::$setCommand[]     = "-c:a";
        self::$setCommand[]     = "aac";
        return $this;

    }

    /**
     * @return $this
     */
    public function rtmpToM3u8($setRtmp = null, $setM3u8 = null){


        self::$setCommand[]     = "-v";
        self::$setCommand[]     = "verbose";
        self::$setCommand[]     = "-i";
        self::$setCommand[]     = $setRtmp;
        self::$setCommand[]     = "-c:v";
        self::$setCommand[]     = "libx264";
        self::$setCommand[]     = "-c:a";
        self::$setCommand[]     = "aac";
        self::$setCommand[]     = "-ac";
        self::$setCommand[]     = "1";
        self::$setCommand[]     = "-strict";
        self::$setCommand[]     = "-2";
        self::$setCommand[]     = "-crf";
        self::$setCommand[]     = "18";
        self::$setCommand[]     = "-profile:v";
        self::$setCommand[]     = "baseline";
        self::$setCommand[]     = "-maxrate";
        self::$setCommand[]     = "400k";
        self::$setCommand[]     = "-bufsize";
        self::$setCommand[]     = "1835k";
        self::$setCommand[]     = "-pix_fmt";
        self::$setCommand[]     = "yuv420p";
        self::$setCommand[]     = "-flags";
        self::$setCommand[]     = "-global_header";
        self::$setCommand[]     = "-hls_time";
        self::$setCommand[]     = "10";
        self::$setCommand[]     = "-hls_list_size";
        self::$setCommand[]     = "6";
        self::$setCommand[]     = "-hls_wrap";
        self::$setCommand[]     = "10";
        self::$setCommand[]     = "-start_number";
        self::$setCommand[]     = "1";
        self::$setCommand[]     = $setM3u8;
        return $this;

    }

    /**
     * @return $this
     */
    public function copy(){

        self::$setCommand[]     = "-c";
        self::$setCommand[]     = "copy";
        return $this;

    }

    /**
     * @param int $x
     * @param int $y
     * @return $this
     */
    public function overlay($x = 10, $y = 10){

        self::$setCommand[]     = '"overlay='.$x.':'.$y.'"';
        return $this;

    }

    /**
     * @return $this
     */
    public function filterComplex(){

        self::$setCommand[]     = "-filter_complex";
        return $this;

    }

    /**
     * @return string
     */
    public function execute(){

        return shell_exec((implode(" ",self::$setCommand)));
    }


    public function txt(){

        print implode(" ",self::$setCommand);
    }


}
