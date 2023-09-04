@push('styles')
<script async src="https://ga.jspm.io/npm:es-module-shims@1.7.3/dist/es-module-shims.js"></script>
<script type="importmap">
   {
   "imports": {
      "three": "https://unpkg.com/three@0.145.0/build/three.module.js"
   }
}
</script>
@endpush
@push('styles')
<script type="module">
   /* const spinner = document.querySelector('.spinner-loader');
   spinner.style.display = 'block';
   document.body.classList.remove('loaded'); */

   import * as THREE from 'three';
   import { OrbitControls } from 'https://unpkg.com/three@0.145.0/examples/jsm/controls/OrbitControls.js';
   import { GLTFLoader } from 'https://unpkg.com/three@0.145.0/examples/jsm/loaders/GLTFLoader.js';

   const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
   renderer.setClearColor(0xffffff, 0);
   const container = document.getElementById('logo-container');
   const object3d = document.getElementById('logo-3d');
   const aspectRatio = container.offsetWidth / container.offsetHeight;
   let newWidth, newHeight;

   if (aspectRatio > 1) {
       newWidth = container.offsetWidth;
       newHeight = container.offsetWidth / aspectRatio;
   } else {
       newWidth = container.offsetHeight * aspectRatio;
       newHeight = container.offsetHeight;
   }

   renderer.setSize(500, 450);
   object3d.appendChild(renderer.domElement);
   const scene = new THREE.Scene();
   scene.background = null;
   renderer.setClearAlpha(0);
   
   const zoom = 1.5;
   const fov = 11;
   const camera = new THREE.PerspectiveCamera(fov, container.offsetWidth / (container.offsetHeight), 0.5, 500);
   camera.position.set(20, 0.90, 2);
   const ambientLight = new THREE.AmbientLight(0xffffff);
   scene.add(ambientLight);
   const controls = new OrbitControls(camera, renderer.domElement);

   controls.enablePan = true;
   controls.enableRotate = true;
   controls.enableZoom = false;
   controls.addEventListener('change', () => {
      renderer.render(scene, camera);
   });
   controls.target.set(0,0.9,0);
   controls.update();

   controls.addEventListener('change', () => {
      renderer.render(scene, camera);
      if (model) {
         console.log(`Model Rotation: x: ${model.rotation.x.toFixed(2)}, y: ${model.rotation.y.toFixed(2)}, z: ${model.rotation.z.toFixed(2)}`);
          console.log(`Camera Position: x: ${camera.position.x.toFixed(2)}, y: ${camera.position.y.toFixed(2)}, z: ${camera.position.z.toFixed(2)}`);
          console.log(`Control Target: x: ${controls.target.x.toFixed(2)}, y: ${controls.target.y.toFixed(2)}, z: ${controls.target.z.toFixed(2)}`);
      }
   });


   let model;
   const loader = new GLTFLoader();
   loader.load('models/rean-old.gltf', function(gltf) {
      model = gltf.scene;
      model.position.set(0, 0, 0);
      const radianY = 4.90 % (2 * Math.PI);  // Konversi ke radian dan normalisasi
      model.rotation.set(0, radianY, 0);
      scene.add(model);
      renderer.render(scene, camera);
      animate();
      /* spinner.style.display = 'none';
      document.body.classList.add('loaded'); */
   }, undefined, function(error) {
      console.log("error: " + error);
      /* spinner.style.display = 'none';
      document.body.classList.add('loaded'); */
   });
   
   function animate() {
      requestAnimationFrame(animate);
      if (model) {
         model.rotation.y += 0.02;
      }
      renderer.render(scene, camera);
   }

   window.adjustRotation = function(x, y, z) {
      if (model) {
         model.rotation.set(x, y, z);
         renderer.render(scene, camera);
      } else {
         console.log("Model belum dimuat.");
      }
   }

   
   window.onresize = function() {
      const aspectRatio = container.offsetWidth / container.offsetHeight;
      let newWidth, newHeight;
      if (aspectRatio > 1) {
         newWidth = container.offsetWidth;
         newHeight = container.offsetWidth / aspectRatio;
      } else {
         newWidth = container.offsetHeight * aspectRatio;
         newHeight = container.offsetHeight;
      }
      renderer.setSize(newWidth, newHeight);
      camera.aspect = aspectRatio;
      camera.updateProjectionMatrix();
      renderer.setSize(newWidth, newHeight);
   }
   window.onresize();

</script>
@endpush