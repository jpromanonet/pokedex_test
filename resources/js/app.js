import Vue from "vue"


import NavBar from "./components/NavBar"
import SearchBox from "./components/SearchBox"
import ListData from "./components/ListData"
import FooterBar from "./components/FooterBar"
import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";


new Vue({
    el: "#app",
    delimiters: ['${', '}'],
    components: {
        'nav-bar': NavBar,
        'search-box': SearchBox,
        'list-data': ListData,
        'footer-bar': FooterBar,
    },
    data () {
        return {
            message: "Hola Pokedex!!!"
        }
    },
})