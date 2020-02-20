<template>
    <div class="project__ui">
        <div class="container">
            <div class="row">
                <div class="typography col-lg-7 col-sm-12">
                    <h2>Typography</h2>
                    <div class="title-font">
                        <p class="graphik">
                            Aa Bb Cc Dd Ee Ff Gg Hh Ii Jj Kk Ll Mm Nn Oo Pp Qq Rr Ss Tt Uu Vv Ww Xx Yy Zz
                        </p>
                        <span>Graphik</span>
                    </div>
                </div>
                <div class="colors col-lg-5 col-sm-12">
                    <h2>Color Pallete</h2>
                    <div class="list">
                        <div class="color color--fullwidth">
                            <div class="inner" style="background-color: #f56600">
                                <span>#f56600</span>
                            </div>
                        </div>
                        <div class="color color--fullwidth">
                            <div class="inner" style="background-color: #522D80">
                                <span>#522D80</span>
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
