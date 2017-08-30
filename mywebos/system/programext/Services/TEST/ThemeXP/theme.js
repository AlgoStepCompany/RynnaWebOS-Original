/*
  edit cmThemeXPBase it must be the root of the theme's images 
*/

var cmThemeXPBase = '.';

// the follow block allows user to re-define theme base directory
// before it is loaded.
try
{
	if (myThemeXPBase)
	{
		cmThemeXPBase = myThemeXPBase;
	}
}
catch (e)
{
}

var cmThemeXP =
{
  	    mainFolderLeft: '<div style="width: 14px; height: 28px" class="themeSpacerDiv" />',
        mainFolderRight: '<div style="width: 11px; height: 28px" class="themeSpacerDiv" />',
        mainItemLeft: '<div style="width: 14px; height: 28px" class="themeSpacerDiv" />',
        mainItemRight: '<div style="width: 11px; height: 28px" class="themeSpacerDiv" />',
        folderLeft: '<div style="width: 25px; height: 25px" class="themeSpacerDiv" />',
        folderRight: '<div style="width: 15px; height: 25px" class="themeSpacerDiv" />',
        itemLeft: '<div style="width: 25px; height: 25px" class="themeSpacerDiv" />',
        itemRight: '<div style="width: 15px; height: 25px" class="themeSpacerDiv" />',
        mainSpacing: 0,
        subSpacing: 0,
        delay: 100
};

var cmThemeXPHSplit = [_cmNoClick, '<td  class="ThemeXPMenuSplitLeft"><div></div></td>' +
					                          '<td  class="ThemeXPMenuSplitText"><div></div></td>' +
					                          '<td  class="ThemeXPMenuSplitRight"><div></div></td>'
		                         ];

var cmThemeXPMainVSplit = [_cmNoClick, '<div>' +
                            '<table height="30" width="10" ' +
                            ' cellspacing="0"><tr><td class="ThemeXPHorizontalSplit">' +
                           '|</td></tr></table></div>'];

var cmThemeXPMainHSplit = [_cmNoClick, '<td  class="ThemeXPMainSplitLeft"><div></div></td>' +
					                          '<td  class="ThemeXPMainSplitText"><div></div></td>' +
					                          '<td  class="ThemeXPMainSplitRight"><div></div></td>'
		                           ];    
 
     