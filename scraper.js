  
  const axios = require('axios');
  const cheerio = require('cheerio');
  const fs = require('fs');
  const url = 'https://he01.tci-thaijo.org/index.php/BMJ/';
  // const dataTxt = require(product)

  const product = {
    name:"",
    image:"",
    about:"",
    link:""
  }
  async function scrape(){
   try{
    //fetch HTML
    const {data} = await axios.get(url);
    //load html
    const $ = cheerio.load(data);

    //select div items
    const item = $("div.pkp_structure_main");
    console.log($(item).find('div.current_issue_title').text());
    product.name = $(item).find('div.current_issue_title').text();
    product.image =  $(item).find('img').attr('src');
    product.about = $(item).find('section.homepage_about p ').text();
    product.link = url;
    fs.writeFile("product.json", JSON.stringify(product, null, 2), (err) =>{
      if(err){
        console.log(err);
        return;
      }
    });
   }catch(err){
    console.log(err);
   }
  }
  scrape();