<div id="pspdfkit" style="height: 100vh"></div>

<script src="{{ asset('vendor/pspdfkit/pspdfkit.js') }}"></script>

<script>
	PSPDFKit.load({
		container: "#pspdfkit",
  		document: "{{ asset('storage/content/file/' . $data->konten->value) }}" // Add the path to your document here.
	})
	.then(function(instance) {
		console.log("PSPDFKit loaded", instance);
	})
	.catch(function(error) {
		console.error(error.message);
	});
</script>