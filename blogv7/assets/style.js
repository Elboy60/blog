 const ratio = .1 ; 
 const options = {
     root: null,
     rootMargin: '0px',
     threshold: ratio
   }
  
   const handleIntersect = function (entries , observer) {
       entries.forEach(function (entry){
           if(entry.intersectionRatio > ratio){
               entry.target.classList.add('reveal-visible');
               observer.unobserve(entry.target)
           }
       })
     console.log('handleIntersect');
   }

   const observer = new IntersectionObserver(handleIntersect, options);
   var recupclass = document.getElementsByClassName("reveal");
  //console.log(recupclass);
  for (let index = 0; index < recupclass.length; index++) {
      const element = recupclass[index];
      observer.observe(element);
  }
   
  
