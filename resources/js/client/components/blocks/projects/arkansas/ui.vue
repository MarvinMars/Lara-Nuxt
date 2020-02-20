<template>
    <div class="project__ui">
        <div class="container">
            <div class="row">
                <div class="typography col-lg-7 col-sm-12">
                    <h2>Typography</h2>
                    <div class="title-font">
                        <p class="interstate">
                            Aa Bb Cc Dd Ee Ff Gg Hh Ii Jj Kk Ll Mm Nn Oo Pp Qq Rr Ss Tt Uu Vv Ww Xx Yy Zz
                        </p>
                        <span>Interstate Bold</span>
                    </div>
                    <div class="text-font">
                        <p class="cambria">
                            Aa Bb Cc Dd Ee Ff Gg Hh Ii Jj Kk Ll Mm Nn Oo Pp Qq Rr Ss Tt Uu Vv Ww Xx Yy Zz
                        </p>
                        <span>Cambria</span>
                    </div>
                </div>
                <div class="colors col-lg-5 col-sm-12">
                    <h2>Color Pallete</h2>
                    <div class="list">
                        <div class="color color--main">
                            <div class="inner" style="background-color: #9d2235">
                                <span>#9d2235</span>
                            </div>
                        </div>
                        <div class="color">
                            <div class="inner" style="background-color: #373a36">
                                <span>#373a36</span>
                            </div>
                        </div>
                        <div class="color">
                            <div class="inner" style="background-color: #17191d">
                                <span>#17191d</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            data: {
                type: Object,
                default: () => {
                    return {};
                }
            }
        },
    }
</script>
