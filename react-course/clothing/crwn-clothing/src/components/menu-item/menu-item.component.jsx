import React from 'react';
import './menu-items.styles.scss';
import {withRouter} from 'react-router-dom';


const MenuItem=({title,imageUrl,size,history,linkUrl,match})=>(
    
<div 
style={{background:`url(${imageUrl})`}}
 className={`${size} menu-item`} onclick={()=>history.push(`${match.url}${linkUrl}`)}>
 <div 
     className="background-image" 
       style={{backgroundImage:`url(${imageUrl})`
       }}/>
       <div className="content">
        <h1 className="title">{title.toUpperCase()}</h1>
        <span className="subtitle">SHOP NOW</span>
        
        </div> 
        </div> 
)
export default withRouter(MenuItem);