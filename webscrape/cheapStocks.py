from __future__ import print_function, unicode_literals
import regex
import six
import click
from pyfiglet import figlet_format
from PyInquirer import prompt, Token, style_from_dict
from PyInquirer import Validator, ValidationError
from pprint import pprint
import requests, bs4
from bs4 import BeautifulSoup

try:
    import colorama
    colorama.init()
except ImportError:
    colorama = None

try:
    from termcolor import colored
except ImportError:
    colored = None

style = style_from_dict({
    Token.QuestionMark: '#E91E63 bold',
    Token.Selected: '#673AB7 bold',
    Token.Instruction: '', # default
    Token.Answer: '#2196f3 bold',
    Token.Question: '', # default
})

class SymbolValidator(Validator):
    def validate(self, document):
        ok = regex.match('^[a-zA-Z0-9]{2,4}$', document.text)
        if not ok:
            raise ValidationError(
                message='Please enter a valid symbol between 2 to 4 characters',
                cursor_position=len(document.text) # move cursor to the end
            )

def log(string, color, font="slant", figlet=False):
    if colored:
        if not figlet:
            six.print_(colored(string, color))
        else:
            six.print_(colored(figlet_format(
                string, font=font), color))
    else:
        six.print_(string)


"""
    The following getInformation function is used to 
    to capture the user input and returns a dict.
"""
def getInformation():
    questions = [
        {
            'type': 'input',
            'name': 'symbol',
            'message': 'What symbol do you want to check',
            'validate': SymbolValidator
        }
    ]

    answers = prompt(questions, style=style)
    return answers

"""
    The following scrapWeb function is used to 
    scrap the web and fetch the current price 
    for all the symbols input by a user.
"""
def scrapWeb(symbol_):

    url = 'https://finance.yahoo.com/quote/{}?p={}'.format(symbol_,symbol_)

    try:
        res = requests.get(url)

        """
            Proceed only when we get a status 200.
        """
        if res.status_code != 200:
            return 'Sorry, your request was not successful, kindly try again.'

        soup=bs4.BeautifulSoup(res.text, 'lxml')
        div_element = soup.find_all('div',{'class':'My(6px) Pos(r) smartphone_Mt(6px)'})
        
        """
            If wrong symbol is input,
            div element will have no content hence it length
            will always be 0.
        """
        if len(div_element) <= 0:
            return 'Sorry, we didn\'t find this symbol: {}'.format(symbol_)

        """
            Checking if price is null/empty.
        """
        price=div_element[0].find('span').text
        if not price:
            return 'Sorry, we couldn\'t fetch the price.'

        results = 'The current price for {} is {} USD'.format(symbol_, str(price))
        return results
    except requests.exceptions.RequestException:
        return 'Sorry we encountered problems interacting with the web, kindly try again later.'

@click.command()
def main():
    log('Cheap Stock', 'green', figlet=True)
    log('Hello, welcome to Cheap Stocks App', 'yellow')
    print('\n')
    log('To quit program, press:', 'yellow')
    log('\t Windows ---> ctrl + c', 'green')
    log('\t Mac ---> command + c', 'green')

    info = getInformation() # get the information input by the user.
    fetch_symbol = info['symbol'] # fetching whatever symbol the user has input.

    cheap_stock_response = scrapWeb(fetch_symbol.upper())

    log('\t ' + cheap_stock_response, 'green')

if __name__ == '__main__':
    main()
