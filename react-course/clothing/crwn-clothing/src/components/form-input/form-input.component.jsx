/*jshint esversion: 6 */
import React from 'react';
import './form-input.styles.scss';

const FormInput=({handleChange,label, ...otherProps})=>{
    return (
        <div className="group">
        <input type="email" className="form-input" onChange={handleChange} {...otherProps}>

        </input>
        {
            label?
            (<label className={`${otherProps.value.length ? 'shrink' : ''} form-input-label`}>

            </label>
            )
            :null
            
        }
        </div>
    )

}
export default FormInput;