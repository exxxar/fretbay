<template>
    <header v-bind:style="{background:'url('+background+') repeat-x'}">
        <main-menu :auth="auth"/>
        <div id="first" style="height: 543px">
            <div class="container" style="top: 15%">
                <h1>
                    <b>Find your mover</b>
                    <span>
                    The leading marketplace for cheap transport and moving services
                </span>
                </h1>
                <div class="row justify-content-center">
                    <form action="/find-transporter">
                        <button type="submit" class="first__btn">
                            REQUEST A QUOTE
                        </button>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-12 go-down">
                        <a id="goDown" @click="goDown">
                            <i class="fa fa-caret-down"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
import MainMenu from "./MainMenu";

export default {
    props: {
        auth: {
            type: String,
            default: '0',
        },
        background: {
            type: String,
            default: "/images/home/video-bg.png",
        }
    },
    components: {
        MainMenu
    },
    methods: {
        goDown() {
            window.scrollTo({
                top: 650,
                behavior: 'smooth'
            });
        }

    },
}
</script>
