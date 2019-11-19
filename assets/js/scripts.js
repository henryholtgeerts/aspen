window.onload = (event) => {

  const pjax = new Pjax({
    cacheBust: false,
    selectors: [
      "title",
      "meta[name=description]",
      ".nav",
      ".main",
    ]
  })
  
}