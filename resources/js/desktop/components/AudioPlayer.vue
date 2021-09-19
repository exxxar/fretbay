<template>
    <div class="audio-player">
        <div class="row justify-content-center align-items-center p-2 m-auto" style="height: 100%; width: 100%">
            <div class="col-2 p-0">
                <div class="actions">
                    <button class="play" v-if="!isPlaying" @click="play">
                        <i class="icon-play cil-media-play"> </i>
                    </button>
                    <button class="pause" v-if="isPlaying" @click="pause">
                        <i class="icon-pause cil-media-pause"></i>
                    </button>
                </div>
            </div>
            <div class="col-8">
                <div class="details" @click="play()">
                    <h2 class="song-title">
                        {{title}}
                    </h2>
                    <k-progress
                        :color="['#ffbf00', '#e17e4e', '#ffe817']"
                        :show-text="false"
                        class="progress-bar-wrapper"
                        :percent="percent"
                    />
                </div>
            </div>
            <div class="col-2 p-0">
                <div class="timer">
                    <p class="start mb-0" v-if="isPlaying||check">{{ currentlyTimer }}</p>
                    <p class="end mb-0" v-if="!isPlaying&&!check&&isFinite(duration)">{{ formatTimer(duration) }}</p>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "AudioPlayer",
        props:['audio'],
        data() {
            return {
                // current: {},
                // coverObject: { cover: true, animated: false },
                // index: 0,
                isPlaying: false,
                currentlyTimer: "00:00",
                player: new Audio(),
                percent: 0,
                title: '',
                duration:0,
                check:false
            };
        },
        mounted() {

            // this.current = {
            //     seconds: 244,
            //     src: this.audio
            // },
            // this.player.src = 'https://travel-club/storage/app/public' + this.audio;
            if(this.audio.type=='audio')
            {
                if(this.audio.src)
                {
                    this.player=new Audio(this.audio.src);
                }
                else {
                    this.player=new Audio(this.audio.path);
                }
                this.duration = this.audio.seconds;
                console.log(this.audio)
                // this.title = this.audio.name;
            }
            else
            {
                // var path = 'https://travel-club.tours'+this.audio;
                // console.log(path)
                this.player = new Audio(this.audio)
                this.title = this.audio.name
            }
            this.player.addEventListener('loadeddata', this.proccessPlaybackStart, false)
            this.player.addEventListener('loadedmetadata', this.proccessPlaybackStart, false)
            this.player.addEventListener("canplay", this.proccessPlaybackStart, false)
        },
        methods: {
            listenersWhenPlay() {
                if(this.isPlaying == true){
                    // start listening
                    this.player.addEventListener("canplay",  this.proccessPlaybackStart, false)
                    this.player.addEventListener('loadeddata', this.proccessPlaybackStart, false)
                    this.player.addEventListener('loadedmetadata', this.proccessPlaybackStart, false)
                    this.player.addEventListener('timeupdate', this.proccessPlaybackTimeUpdate, false)
                } else {
                    // stop listening
                    this.player.removeEventListener('canplay', this.proccessPlaybackStart, false)
                    this.player.removeEventListener('loadeddata', this.proccessPlaybackStart, false)
                    this.player.removeEventListener('loadedmetadata', this.proccessPlaybackStart, false)
                    this.player.removeEventListener('timeupdate', this.proccessPlaybackTimeUpdate, false)
                }
                this.player.addEventListener(
                    "ended",
                    function () {
                        this.pause();
                        // this.isPlaying = false;
                        // this.next();
                    }.bind(this)
                );
                // this.player.addEventListener("timeupdate", () => {
                //     var playerTimer = this.player.currentTime;
                //     this.currentlyTimer = this.formatTimer(playerTimer);
                //     this.percent = (playerTimer * 100) / this.player.duration;
                //     // this.current.isPlaying = true;
                // });
                // this.player.addEventListener(
                //     "ended",
                //     function () {
                //         // this.next();
                //     }.bind(this)
                // );
            },
            play() {
                this.check=true;
                // if (this.audio !== "undefined" || this.audio !== '') {
                //     // this.current.isPlaying = false;
                //     // this.index = this.audios.indexOf(this.current);
                //     // this.current = {
                //     //     seconds: 244,
                //     //     src: this.audio
                //     // },
                //     // this.player.src = this.audio;
                // }
                this.player.play();
                this.isPlaying = true;
                this.listenersWhenPlay();
            },
            pause() {
                this.player.pause();
                this.isPlaying = false;
            },
            proccessPlaybackStart() {
                // console.log('audio.duration', this.player.duration)
                if(this.type=='url')
                {
                    this.duration = this.player.duration;
                    console.log('duration',  this.duration )
                    console.log('duration1',  this.player.duration )
                    console.log('pla',  this.player )

                }
                // this.duration=this.player.duration // get track duration

            },
            proccessPlaybackTimeUpdate() {
                // check if track duration is NaN or zero and rectify

                if(isNaN(this.duration ) || !isFinite(this.duration)){
                    this.duration = 60 // give reasonable track duration
                }
                else {
                    if(this.type!='url')
                    {
                        this.duration = (isNaN(this.player.duration) || !isFinite(this.player.duration)) ? this.audio.seconds : this.player.duration // get track duration
                    }
                    else{
                        this.duration =(isNaN(this.player.duration) || !isFinite(this.player.duration)) ? 60 : this.player.duration
                    }
                }
                var playerTimer = this.player.currentTime;
                this.currentlyTimer = this.formatTimer(Number(playerTimer));
                this.percent = (Number(playerTimer) * 100) / Number(this.duration);
                this.percent =Number(this.percent.toFixed(1))
                console.log(this.percent,'% ', this.duration)

            },
            formatTimer(seconds) {
                let minutes = parseInt(seconds / 60).toString();
                seconds = parseInt(seconds % 60).toString();

                let output = minutes >= 10 ? `${minutes}` : `0${minutes}`;
                output += seconds >= 10 ? `:${seconds}` : `:0${seconds}`;

                return output;
            }
        }
    }
</script>

<style scoped>
    .audio-player{
        border-radius: 50px;
        background: white;
        -webkit-box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
        width: 300px;
    }
    button {
        appearance: none;
        background: none;
        border: none;
        outline: none;
        cursor: pointer;
    }

    button:hover {
        opacity: 0.8;
        transform: scale(1.1);
    }

    .song-details {
        margin-top: 25px;
    }

    .animated {
        animation: appear-smoothly 1s normal both;
        transition: all 0.3s;
    }


    .song-title {
        width: 100%;
        color: #53565a;
        font-size: 1.13em;
        text-align: center;
        margin-bottom: 5px;
    }

    .details {
        /*margin-left: 10px;*/
        width: 100%;
    }

    .details > .song-title {
        color: #585858;
        font-size: inherit;
        text-align: left;
    }

    .details > .artist {
        color: #5d5555;
        text-align: left;
    }

    .controls {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px 15px;
    }

    .play,
    .pause {
        /*background-image: linear-gradient(to right top,#d16ba5,#c777b9,#ba83ca,#aa8fd8,#9a9ae1,#8aa7ec,#79b3f4,#69bff8,#52cffe,#41dfff,#46eefa,#5ffbf1);*/
        background-image: linear-gradient(to right top,#ffbf00, #e17e4e);
        /*background: #e17e4e;*/
        border-radius: 50%;
        width: 30px;
        height: 30px;
        justify-content: center;
        box-shadow: -1px 17px 24px -6px rgba(0,0,0,.2);
        cursor: pointer;
        color: #fff;
    }

    .next,
    .prev {
        border: 0;
        border-radius: 50%;
        font-size: 20px;
        width: 50px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        background-color: rgba(0,0,0,.09);
        color: #fff;
        transition: background-color .2s;
        position: relative;
    }

    .playlist {
        background-color: #fff;
        overflow-y: auto;
        max-height: 622px;
        border-radius: 5px;
    }

    .playlist h3 {
        color: #212121;
        font-size: 18px;
        font-weight: 400;
        margin-top: 20px;
        margin-bottom: 20px;
        text-align: center;
    }

    .playlist .song {
        display: flex;
        padding: 10px;
    }

    .actions > .delete {
        border-radius: 50%;
        width: 40px;
        height: 40px;
        justify-content: center;
        box-shadow: -1px 17px 24px -6px rgba(0,0,0,.2);
        cursor: pointer;
        font-size: 20px;
        color: #ba83ca;
    }

    .playlist .song:hover {
        background-color: #ededed;
        transition: box-shadow .2s,background-color .3s;
    }

    .timer {
        display: flex;
        width: 100%;
        justify-content: space-between;
        padding: 0px;
    }

    .footer {
        display: flex;
        justify-content: space-between;
        font-size: 10px;
    }

    .footer > a {
        cursor: pointer;
        color: #d4d4d4;
        position: relative;
        top: -10px;
        font-size: 25px;
    }
    .progress-bar-wrapper{
        margin: 0 !important;
        padding: 0;
        color: #606266;
        font-size: 14px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }
    @media screen and (max-width: 576px) {
        .timer{
            font-size: 12px;
        }
    }
</style>
<style>
    .k-progress-outer {
        /*margin-top: 15px !important;*/
        /*padding-right: 0 !important;*/
        padding-right: .5rem !important;
    }
</style>
