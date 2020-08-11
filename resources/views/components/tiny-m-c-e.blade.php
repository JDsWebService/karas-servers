<script src="https://cdn.tiny.cloud/1/iiymszi5ey6bty2irx4oyirzn9uugi59vj1010ne9h3wjvar/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
	tinymce.init({
		selector: 'textarea',
		menubar: false,
		plugins: [
		'autolink lists link anchor',
		'searchreplace visualblocks code',
		'paste code help wordcount'
		],
		toolbar: 'undo redo | ' + 
		'formatselect | ' +
		'bold italic | ' +
		'link | ' + 
		'alignleft aligncenter alignright alignjustify | ' +
		'bullist numlist | ' +
		'removeformat',
		block_formats: 'Paragraph=p; Header 1=h1; Header 2=h2; Header 3=h3; Header 4=h4; Header 5=h5; Header 6=h6',
		invalid_elements: 'div',

	});
</script>