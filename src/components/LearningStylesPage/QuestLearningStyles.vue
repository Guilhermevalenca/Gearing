<template>
<div>

<h2>Questionário de Estilo de aprendizagem</h2>
<p>texto aqui</p>

<div>
<h2>1.Pergunta</h2>
<label>

<input v-model="Quest1" type="range" value="1" min="1" max="4">
</label>
<label>

<input v-model="Quest2" type="range" value="1" min="1" max="4">
</label>
<label>

<input v-model="Quest3" type="range" value="1" min="1" max="4">
</label>
<label>

<input type="range" value="1" min="1" max="4">
</label>

<h2>2.Pergunta</h2>
<label>

<input type="range" value="1" min="1" max="4">
</label>
<label>

<input type="range" value="1" min="1" max="4">
</label>
<label>

<input type="range" value="1" min="1" max="4">
</label>
<label>

<input type="range" value="1" min="1" max="4">
</label>

<h2>3.Pergunta</h2>

<label>

<input type="range" value="1" min="1" max="4">
</label>
<label>

<input type="range" value="1" min="1" max="4">
</label>
<label>

<input type="range" value="1" min="1" max="4">
</label>
<label>

<input type="range" value="1" min="1" max="4">
</label>

<h2>4.Pergunta</h2>

<label>

<input type="range" value="1" min="1" max="4">
</label>
<label>

<input type="range" value="1" min="1" max="4">
</label>
<label>

<input type="range" value="1" min="1" max="4">
</label>
<label>

<input type="range" value="1" min="1" max="4">
</label>

</div>
</div>
</template>

<script>
export default{
  name: 'App',
  data() {
    return {

    }
  }
}
</script>