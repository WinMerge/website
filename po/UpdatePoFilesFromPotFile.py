#!/usr/bin/env python
# -*- coding: utf-8 -*-;

# The MIT License
# 
# Copyright (c) 2010 Tim Gerundt <tim@gerundt.de>
# 
# Permission is hereby granted, free of charge, to any person obtaining a copy
# of this software and associated documentation files (the "Software"), to deal
# in the Software without restriction, including without limitation the rights
# to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
# copies of the Software, and to permit persons to whom the Software is
# furnished to do so, subject to the following conditions:
# 
# The above copyright notice and this permission notice shall be included in
# all copies or substantial portions of the Software.
# 
# THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
# IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
# FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
# AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
# LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
# OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
# THE SOFTWARE.

# Python script to updates the language PO files from the master POT file

import os
import os.path
import polib

def main():
    #POT file...
    refpot = polib.pofile('en-US.pot')
    
    #PO files...
    for itemname in os.listdir('.'): #For all dir items...
        if os.path.isfile(itemname): #If a file...
            filename = os.path.splitext(itemname)
            if str.lower(filename[1]) == '.po': #If a PO file...
                po = polib.pofile(itemname)
                po.merge(refpot)
                po.save()

# MAIN #
if __name__ == "__main__":
    main()
