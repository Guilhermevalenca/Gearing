<template>
    <section class="caixa">
        <div>
            <p class="presentation">Seja bem-vindo(a) ao Gearing! Estamos aqui para te ajudar a encontrar um método de
                estudo
                que mais se aplique a você; vou te apresentar algumas formas de começar e/ou complementar seus estudos,
                sinta-se
                a vontade para compartilhar as sugestões de metodologias de aprendizagem que você conhece em nosso fórum, e
                assim, ajudar outros estudantes a montar seu próprio cronograma de estudos.</p>
        </div>
        <div>
            <p>PARTE EM PLANEJAMENTO</p>
        </div>
    </section>
</template>
<style scoped>

.caixa {
    display: flex;
    align-items: center;
    flex-flow: column wrap;
    justify-content: center;
}

div {
    display: flex;
}

.presentation {
    font-size: 2em;
    padding-left: 5em;
    padding-right: 5em;
    padding-top: 2em;
    text-align: justify;
}

@media (max-width: 1000px) {
    .presentation {
        font-size: 1.2em;
    }
}
</style>
