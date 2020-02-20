<template>
    <section>
        <section class="section services-banner" style="background-image: url(/img/services-background.jpg)" >
            <div class="container">
                <h2>What we do</h2>
                <p>We help brands connect with consumers at every interaction.</p>
                <div class="link">
                    <a href="#"><span><small data-hover="Explore our services">Explore our services</small></span></a>
                </div>
            </div>
        </section>
    </section>
</template>

<script>
    export default {
        name: "servicesBanner",
        props: ['data'],
    }
</script>
