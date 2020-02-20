<template>
    <div class="project__ui">
        <div class="container">
            <div class="row">
                <div class="typography col-lg-7 col-sm-12">
                    <h2>Typography</h2>
                    <div class="title-font">
                        <p class="proxima">
                            Aa Bb Cc Dd Ee Ff Gg Hh Ii Jj Kk Ll Mm Nn Oo Pp Qq Rr Ss Tt Uu Vv Ww Xx Yy Zz
                        </p>
                        <span>Proxima Nova</span>
                    </div>
                    <div class="text-font">
                        <p class="oswald">
                            Aa Bb Cc Dd Ee Ff Gg Hh Ii Jj Kk Ll Mm Nn Oo Pp Qq Rr Ss Tt Uu Vv Ww Xx Yy Zz
                        </p>
                        <span>Oswald</span>
                    </div>
                </div>
                <div class="colors col-lg-5 col-sm-12">
                    <h2>Color Pallete</h2>
                    <div class="list">
                        <div class="color color--main">
                            <div class="inner" style="background-color: #ce0e3d">
                                <span>#ce0e3d</span>
                            </div>
                        </div>
                        <div class="color">
                            <div class="inner" style="background-color: #acb1b5">
                                <span>#acb1b5</span>
                            </div>
                        </div>
                        <div class="color">
                            <div class="inner" style="background-color: #000000">
                                <span>#000000</span>
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
