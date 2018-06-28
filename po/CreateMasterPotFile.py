#!/usr/bin/env python
# -*- coding: utf-8 -*-;

# Python script to create the POT file for the website
#
# Copyright 2009-2018 Tim Gerundt <tim@gerundt.de>
#
# This file is part of WinMerge. WinMerge is free software under the terms of the
# GNU General Public License. You should have received a copy of the license
# along with WinMerge.  If not, see <http://www.gnu.org/licenses/>.

import os
from time import strftime
import re

def getPhpFiles(path):
    ''' Get all php files from a folder and his subfolders '''
    phpfiles = []
    for root, dirs, files in os.walk(path, topdown = True):
      for file in files:
        basename, extension = os.path.splitext(file)
        if str.lower(extension) == '.php' or str.lower(extension) == '.inc': #If a PHP file...
          phpfiles.append(os.path.join(root, file))
    return phpfiles

def getTranslationsFromPhpFile(filepath, translations):
    ''' Get the translations from a php file '''
    rGettext = re.compile('_e?\([\'](.+?)[\']', re.DOTALL)
    rGettextTestMultiLine = re.compile('_e?\([\']([^\'\n]+)\n')
    
    phpfile = open(filepath, 'r', errors='ignore')
    lines = phpfile.readlines()
    phpfile.close()
    
    i = 0
    for line in lines: #For all lines...
        #--------------------------------------------------------------------------------
        # Multi-line translations...
        #--------------------------------------------------------------------------------
        tmps = rGettextTestMultiLine.findall(line)
        if tmps: #If found a multi-line gettext function...
            tmps = rGettext.findall("".join(lines[i:]))
            for tmp in tmps: #For all translations...
                if tmp.find('\n') > 0: #If a multi-line translation...
                    translation = tmp.replace('\n', '\\n')
                    if translation in translations: #If the translation is already exists...
                        translations[translation] += [(filepath, i)]
                    else: #If the translation is NOT already exists...
                        translations[translation] = [(filepath, i)]
                    break #Use only the FIRST multi-line translation!
        #--------------------------------------------------------------------------------
        
        #--------------------------------------------------------------------------------
        # Normal translations...
        #--------------------------------------------------------------------------------
        i += 1
        tmps = rGettext.findall(line)
        if tmps: #If found a gettext function...
            for tmp in tmps: #For all translations...
                translation = tmp
                if translation in translations: #If the translation is already exists...
                    translations[translation] += [(filepath, i)]
                else: #If the translation is NOT already exists...
                    translations[translation] = [(filepath, i)]
        #--------------------------------------------------------------------------------

def main():
    translations = {}
    php_dir = os.path.abspath('../htdocs')
    php_files = getPhpFiles(php_dir)
    php_files.sort()
    for php_file in php_files: #For all php files...
        getTranslationsFromPhpFile(php_file, translations)
    
    potfile = open('en-US.pot', 'wb') #Open as binary to prevent the translation of EOL characters!
    potfile.write(b'# This file is part from WinMerge <http://winmerge.org/>\n')
    potfile.write(b'# Released under the "GNU General Public License"\n')
    potfile.write(b'# \n')
    potfile.write(b'msgid ""\n')
    potfile.write(b'msgstr ""\n')
    potfile.write(b'"Project-Id-Version: WinMerge\\n"\n')
    potfile.write(b'"Report-Msgid-Bugs-To: http://bugs.winmerge.org\\n"\n')
    potfile.write(b'"POT-Creation-Date: %s\\n"\n' % strftime('%Y-%m-%d %H:%M+0000').encode())
    potfile.write(b'"PO-Revision-Date: \\n"\n')
    potfile.write(b'"Last-Translator: \\n"\n')
    potfile.write(b'"Language-Team: English <winmerge-translate@lists.sourceforge.net>\\n"\n')
    potfile.write(b'"MIME-Version: 1.0\\n"\n')
    potfile.write(b'"Content-Type: text/plain; charset=utf-8\\n"\n')
    potfile.write(b'"Content-Transfer-Encoding: 8bit\\n"\n')
    potfile.write(b'"X-Poedit-Language: English\\n"\n')
    potfile.write(b'"X-Poedit-SourceCharset: utf-8\\n"\n')
    potfile.write(b'"X-Poedit-Basepath: ../htdocs/\\n"\n')
    potfile.write(b'\n')
    for translation in translations: #For all translations...
        #--------------------------------------------------------------------------------
        # References...
        #--------------------------------------------------------------------------------
        reference_line = ''
        references = translations[translation]
        for reference in references: #For all references...
            reference_path = reference[0].replace(php_dir + os.sep, '') #Switch to relative path
            reference_path = reference_path.replace('\\', '/') #Switch to linux path separator
            reference_id = '%s:%u' % (reference_path, reference[1])
            if reference_line: #If NOT first reference...
                if len(reference_line + reference_id) > 77: #If reference line to long...
                    potfile.write(b'%s\n' % reference_line.encode())
                    reference_line = '#: ' + reference_id
                else: #If reference line NOT to long...
                    reference_line += ' ' + reference_id
            else: #If first reference...
                reference_line = '#: ' + reference_id
        if reference_line: #If reference line exists...
            potfile.write(b'%s\n' % reference_line.encode())
        #--------------------------------------------------------------------------------
        potfile.write(b'#, c-format\n')
        potfile.write(b'msgid "%s"\n' % translation.replace('"', '\\"').encode())
        potfile.write(b'msgstr ""\n')
        potfile.write(b'\n')
    potfile.close()

# MAIN #
if __name__ == "__main__":
    main()
