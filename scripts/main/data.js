//@mumayacon

const appVue = Vue.createApp({

    data() {

        return {
            
            products: [

                {

                    key: 1,
                    title: "Igor",
                    artist: "Tyler, The Creator",
                    price: 800,
                    time: "39:47",
                    cover: "../media/img/cover/igor.jpg"

                },

                {

                    key: 2,
                    title: "Blonde",
                    artist: "Frank Ocean",
                    price: 2600,
                    time: "1:16:41",
                    cover: "../media/img/cover/blonde.jpg"

                },

                {

                    key: 3,
                    title: "The Melodic Blue",
                    artist: "Baby Keem",
                    price: 600,
                    time: "1:21:04",
                    cover: "../media/img/cover/blue.jpg"

                },

                {

                    key: 4,
                    title: "Thriller",
                    artist: "Michael Jackson",
                    price: 1000,
                    time: "42:22",
                    cover: "../media/img/cover/thriller.jpg"

                },

                {

                    key: 5,
                    title: "My Beautiful Dark Twisted Fantasy",
                    artist: "Kanye West",
                    price: 1400,
                    time: "1:08:41",
                    cover: "../media/img/cover/mbdtf.jpg"

                },

                {

                    key: 6,
                    title: "Flower Boy",
                    artist: "Tyler, The Creator",
                    price: 650,
                    time: "47:26",
                    cover: "../media/img/cover/flower boy.jpg"

                },

            ]

        }

    },



}).mount("#appVue")